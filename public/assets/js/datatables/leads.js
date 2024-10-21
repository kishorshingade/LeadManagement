// $(document).ready(function () {
// 	$("#leadsTable").DataTable({
// 		ajax: {
// 			url: "get-leads",
// 			type: "GET",
// 			dataSrc: "",
// 		},
// 		columns: [
// 			{ data: "customer_name" },
// 		    { data: "phone" },
// 			{ data: "requirement"},
// 			{ data: "date"},
// 			{ data: "status"},
// 			{ data: "created_at"},
// 			{
//                 data: null,
//                 render: function(data, type, row) {
//                     return '<a href="lead/' + row.id + '" class="edit-link btn btn-primary btn-sm mx-2" data-id="' + row.id + '">Edit</a>' +
//                            '<a href="#" class="delete-link btn btn-danger btn-sm delete-lead" data-id="' + row.id + '" data-route="delete-lead/' + row.id + '">Delete</a>';
//                 }
//             }
// 		],
// 	});
// });
