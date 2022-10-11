<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-2">User List</h2>
                    <hr class="mb-3">
                    <table id="datatable" class="table table-striped" style="width:100%">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Full Name</th>
                            <th>Email</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    @section('extra-js')
        <script>

            /*
            Q. How can I export the whole table when using serverSide and Buttons.

            A. Buttons is a client-side process, so it can only export the data available at the client-side.
            When server-side processing is enabled, the full data set is not held on the client-side,
            so only the visible data can be exported. You can either: 1. Use a server-side process to
            create the files to download (recommended) or 2. Disable server-side processing.

            reference: https://datatables.net/faqs/index#Server-side-processing
             */

            $(document).ready(function () {
                $('#datatable').DataTable({
                    "processing": true,
                    "serverSide": true,
                    "ajax": "{{ route('dashboard.datatables') }}",
                    "columns": [
                        {"data": "id"},
                        {"data": "name"},
                        {"data": "email"}
                    ],
                    lengthMenu: [
                        [10, 25, 50, 100, -1],
                        ['10 rows', '25 rows', '50 rows', '100 rows','All'],
                    ],
                    dom: 'Bfrtip', // Blfrtip or Bfrtip
                    buttons: [
                        'pageLength',
                        { extend: 'pdf', text: '<i class="fas fa-file-pdf fa-1x text-red-600" aria-hidden="true"> PDF</i>' },
                        { extend: 'csv', text: '<i class="fas fa-file-csv fa-1x text-warning" aria-hidden="true"> CSV</i>' },
                        { extend: 'excel', text: '<i class="fas fa-file-excel text-green-600" aria-hidden="true"> EXCEL</i>' },
                        { extend: 'print', text: '<i class="fas fa-print text-primary" aria-hidden="true"> PRINT</i>' },
                    ],
                });
            });
        </script>
    @endsection
</x-app-layout>
