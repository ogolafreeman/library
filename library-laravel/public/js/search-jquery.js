$(document).ready(function(){$("#myInput").on("keyup",function(){var a=$(this).val().toLowerCase();$("#tablex tr").filter(function(){$(this).toggle($(this).text().toLowerCase().indexOf(a)> -1)})})}),$(document).ready(function(){$("#categorySearch").on("keyup",function(){var a=$(this).val().toLowerCase();$("#tablex tr").filter(function(){$(this).toggle($(this).text().toLowerCase().indexOf(a)> -1)})})})


