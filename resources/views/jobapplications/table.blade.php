<div class="table-responsive">
    <table class="table" id="jobapplications-table">
        <thead>
            <tr>
                <th>Firstname</th>
        <th>Lastname</th>
        <th>Address</th>
        <th>Email</th>
        <th>Phonenumber</th>
        <th>Position</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($jobapplications as $jobapplication)
            <tr>
                <td>{{ $jobapplication->firstname }}</td>
            <td>{{ $jobapplication->lastname }}</td>
            <td>{{ $jobapplication->address }}</td>
            <td>{{ $jobapplication->email }}</td>
            <td>{{ $jobapplication->phonenumber }}</td>
            <td>{{ $jobapplication->position }}</td>
                <td width="120">
                    {!! Form::open(['route' => ['jobapplications.destroy', $jobapplication->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('jobapplications.show', [$jobapplication->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-eye"></i>
                        </a>
                        <a href="{{ route('jobapplications.edit', [$jobapplication->id]) }}" class='btn btn-default btn-xs'>
                            <i class="far fa-edit"></i>
                        </a>
                        {!! Form::button('<i class="far fa-trash-alt"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
