<table>
    <thead>
    <tr>
        <th>S/N</th>
        <th>Access Code</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>No of Guests</th>
        <th>Event Attending</th>
    </tr>
    </thead>
    <tbody>
    @foreach($guests as $guest)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $guest->slug }}</td>
            <td>{{ $guest->name }}</td>
            <td>{{ $guest->email }}</td>
            <td>{{ $guest->phone }}</td>
            <td>{{ $guest->number_of_guest }}</td>
            <td>{{ $guest->attending }}</td>
        </tr>
    @endforeach
    </tbody>
</table>
