$(document).ready(function(){
	$("#employeeProfileTable").DataTable({
		ajax :{
			url : "get-employeeProfile",
            type : "GET",
			dataSrc: "",
		},
		columns : [
		    {
				data: 'profile_image',
				render: function (data, type, row) {
					let imageUrl = $('meta[name="base-url"]').attr("content") + "uploads/profile/" + data;
					return `<img src="${imageUrl}" alt="Profile Image" class="mx-5" style="width: 100px; height: auto;">`;
				}
			},
			{ data : "employee_id" },
			{ data : "father_name" },
			{ data : "mother_name" },
			{ data : "date_of_birth" },
			{ data : "gender" },
			{ data : "age" },
			{ data : "alt_phone" },
			{ data : "nationality" },
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
});
