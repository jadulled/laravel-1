<?php namespace App\Http\Controllers\Admin;

use App\Modules\Users\UserManager;
use App\Modules\Users\UserRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Users\CreateUserRequest;
use App\Http\Requests\Users\UpdateUserRquest;
use Laracasts\Flash\Flash;

class UsersController extends Controller{

    /**
     * User repository
     *
     * @var UserRepo
     */
    protected $userRepo;

    /**
     * Initialize the user repository and validate auth for the users module
     *
     * @param UserRepo $userRepo
     */
    function __construct(UserRepo $userRepo)
    {
        $this->userRepo = $userRepo;
        $this->middleware('auth:admin');
    }

    /**
     * Show a list of all register users
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = $this->userRepo->all();
        return view('backend.users.index', compact('users'));
    }

    /**
     * Create a new user
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a new user
     *
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUserRequest $request)
    {
        $user = $this->userRepo->model();
        $manager = new UserManager($user, $request->all());
        $manager->save();
        Flash::success('The user was created successfully!', 'California Electrical Training');
        return redirect()->route('admin.users.index');
    }

    /**
     * Edit user by the ID gived
     *
     * @param $slug
     * @return \Illuminate\View\View
     */
    public function edit($slug)
    {
        $user = $this->userRepo->findBySlug($slug);
        return view('backend.users.edit', compact('user'));
    }

    /**
     * Update the edited user by the ID gived
     *
     * @param UpdateUserRquest $request
     * @param $slug
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateUserRquest $request, $slug)
    {
        $user = $this->userRepo->findBySlug($slug);
        $manager = new UserManager($user, $request->all());
        $manager->save();
        Flash::success('The user was updated successfully!', 'California Electrical Training');
        return redirect()->route('admin.users.index');
    }

    /**
     * Destroy a user by the ID gived
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = $this->userRepo->findOrFail($id);
        $user->delete();
        Flash::success('The user was deleted successfully!', 'California Electrical Training');
        return redirect()->route('admin.users.index');
    }



} 