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
            <th>Event Name</th>
            <th>Payment Status</th>
            <th>Transaction ID</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($event_registrations as $event_registration)
        @if ($event_registration->user)

        <tr>
            <td>{{ optional($event_registration->user)->name }}</td>
            <td>{{ optional($event_registration->user)->email }}</td>
            <td>{{ optional($event_registration->user)->college_name ?? '-' }}</td>
            <td>{{ optional($event_registration->user)->phone }}</td>
            <td>{{ optional($event_registration->user)->usn ?? '-' }}</td>
            <td>{{ optional($event_registration->user)->pass_type ?? '-' }}</td>
            <td>{{ date_format($event_registration->created_at,"Y-m-d") ?? '-' }}</td>
            <td>{{ optional($event_registration->event)->name ?? '-' }}</td>
            <td>{{ optional($event_registration->user)->is_paid ? 'Paid':'Not Paid' }}</td>
            <td>{{ optional($event_registration->user)->transaction_id ?? '-' }}</td>
        </tr>

        @endif
        @endforeach

    </tbody>
</table>