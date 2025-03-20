<table>
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>College</th>
            <th>Phone</th>
            <th>USN</th>
            <th>Pass Type</th>
            <th>Registration Date</th>
            <th>Payment Status</th>
            <th>Transaction ID</th>
            <th>Events Participated</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        @if ($user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->college_name ?? '-' }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->usn ?? '-' }}</td>
            <td>{{ $user->pass_type ?? '-' }}</td>
            <td>{{ date_format($user->created_at,"Y-m-d") ?? '-' }}</td>
            <td>{{ $user->is_paid ? 'Paid':'Not Paid' }}</td>
            <td>{{ $user->transaction_id ?? '-' }}</td>
         
                @foreach ($user->eventRegistrations as $item)
                <td> {{$item->event->name}}   </td>
                @endforeach
         
        </tr>

        @endif
        @endforeach

    </tbody>
</table>