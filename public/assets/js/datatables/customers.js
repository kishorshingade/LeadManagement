// $(document).ready(function() {
//     $('#customersTable').DataTable({
//         "ajax": {
//             url: "get-customers",
//             type: "GET",
//             dataSrc: ""
//         },
//         columns: [
//             { data: "name" },
//             { data: "email" },
//             { data: "contact" },
//             { data: "company_name" },
//             { data: "website" },
//             {
//                 data: null,
//                 render: function(data, type, row) {
//                     return '<a href="customer/' + row.id + '" class="edit-link btn btn-primary btn-sm mx-2" data-id="' + row.id + '">Edit</a>' +
//                            '<a href="#" class="delete-link btn btn-danger btn-sm delete-customer" data-id="' + row.id + '" data-route="delete-customer/' + row.id + '">Delete</a>';
//                 }
//             }
//         ]
//     });

// });


