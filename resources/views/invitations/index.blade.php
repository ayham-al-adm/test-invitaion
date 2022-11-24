@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Invitations') }}</div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <a href="{{ route('invitations.create') }}" class="btn btn-primary">Create New</a>
                            </div>
                        </div>
                        <table id="example" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID:</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($invitations as $invit)
                                    <tr>
                                        <td>{{ $invit->id }}</td>
                                        <td>{{ $invit->name }}</td>
                                        <td>{{ $invit->email }}</td>
                                    </tr>
                                @empty
                                    {{-- TODO: move this section into a separate component --}}
                                    <tr>
                                        <td class="text-center" colspan="3">
                                            No data found!
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID:</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                </tr>
                            </tfoot>
                        </table>
                        {!! $invitations->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    @section('scripts')
        <script>
            $(document).ready(function() {
                $('#example').DataTable();
            });
        </script>
    @endsection
@endsection
