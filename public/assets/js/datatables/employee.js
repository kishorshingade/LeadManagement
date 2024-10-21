$(document).ready(function(){
	$("#employeeTable").DataTable({
		ajax: {
			url : "get-employee",
            type : "GET",
			dataSrc: "",
		},
		columns : [
			{ data : "employee_id" },
			{ data : "first_name" },
			{ data : "last_name" },
			{ data : "phone" },
			{ data : "email" },
			{ data : "password" },
			{ data : "status" },
			{ data : "created_at" },
			{
                data: null,
                render: function(data, type, row) {
                    return '<a href="employee/' + row.id + '" class="edit-link btn btn-primary btn-sm mx-2" data-id="' + row.id + '">Edit</a>' +
                           '<a href="#" class="delete-link btn btn-danger btn-sm delete-employee" data-id="' + row.id + '" data-route="delete-employee/' + row.id + '">Delete</a>';
                }
            }

		]

	});
})
;
