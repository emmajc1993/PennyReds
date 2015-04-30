<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Change Background Colour</title>
		<script language="javascript">
			function changeColor() {
				document.bgColor = "#" + changeBG.color.value;
			}</script>
	</head>
	<body>
		<form name="changeBG">
			<table>
				<tr>
					<td>
						<input type="text" name="color" />
					</td>
					<td>
						<input type="button" name="changeBg" onclick="changeColor();" value="Change Colour!" />
					</td>
				</tr>
			</table>
		<form>
	</body>
	
</html>