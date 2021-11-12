$(document).ready(

function()
{
	$("#blur-bg").fadeIn(1000);
	$("#modal").animate({"top":"150px"},1000);
	$("#close").click(

		function()
		{

			$("#blur-bg").fadeOut(1000);
			$("#modal").animate({"top":"-800px"},1300);
		}
		);
}



	);