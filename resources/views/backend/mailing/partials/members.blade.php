<table class="table table-bordered table-hover">
    <tbody>
        @foreach(array_slice($members, -10, 10, true) as $member)
            <tr><td>{{ $member['email'] }}</td></tr>
        @endforeach
    </tbody>
</table>
