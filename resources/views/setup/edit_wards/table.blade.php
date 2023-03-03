<div class="table-responsive">
    <form action="{{ route('wards.edit.index') }}" method="POST">
        @csrf
    <table class="table table-hover nowrap mb-0">
        <thead>
            <tr>
                
                <th>S/N</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody id="table_body">
           
        </tbody>
    </table>
    <button type="submit" class="btn btn-primary mt-2">Submit</button>
    </form>
</div>


