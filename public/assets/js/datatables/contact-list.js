$(document).ready(function () {
	$("#usersTable").DataTable({
		order: [[1, "asc"]],
		dom: "lBfrtip",
		lengthMenu: [
			[10, 25, 50, 99999999],
			[10, 25, 50, "All"],
		],
		columnDefs: [{ orderable: false, targets: [0, 5] }],
		buttons: [
			{
				extend: "collection",
				text: '<i class="fa fa-file"></i> Export',
				buttons: ["copy", "excel", "csv", "pdf", "print"],
			},
		],
		processing: true,
		serverSide: false, // Set serverSide to false for local processing
		ajax: {
			url: "https://fakestoreapi.com/users",
			cache: false,
			type: "GET",
			dataSrc: "", 
		},
		columns: [
			{ data: "id" },
			{ data: "username" },
			{ data: "email" },
			{ data: "name.firstname" },
			{ data: "name.lastname" },
			{ data: "phone" },
			{ data: "address.city" },
			{ data: "address.street" },
			{ data: "address.number" },
			{ data: "address.zipcode" },
		],
	});
});
