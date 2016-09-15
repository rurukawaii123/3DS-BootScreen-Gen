<!DOCTYPE html>
<html>
<head>
	<title>Project Tritium-3D</title>
	<link rel="stylesheet" href="//cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/css/bootstrap.css" />
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src="//cdn.rawgit.com/twbs/bootstrap/v4-dev/dist/js/bootstrap.js"></script>

	<style type="text/css">
		@font-face {font-family:"IBMVGA8"; src: url("fonts/PxPlus_IBM_VGA8.ttf")}

		body { font-family: 'IBMVGA8', sans-serif; background: #1b2936 !important; color: #EEE !important; }
		h1 { font-weight: 30; text-align: center; font-size: 48px; margin: 0px 0px 0px; }
		span { font-weight: 30; display: block; font-size: 20px; text-align: center; margin: -8px; }
		span.credit { font-size: 14px; margin-bottom: 6px;}
		.container { width: 830px; margin: 12px auto 16px; }
		.select-inline { width: auto; display: inline-block; }
		.form-control-sm { padding: .1rem .2rem; font-weight: 600; }
		label[for] { font-weight: 600; }

		.col-xs-10 .radio { width: 20%; height: 80px; display: inline-block; position: relative; min-height: 1px; padding-right: 15px; padding-left: 15px; float: left; }
	</style>
	<script type="text/javascript">

		jQuery(document).ready(function($) {
			var $IMG = $("#preview");
			$("#settings input, #settings select").on('change', function() {

				$form = $("#settings");
				var url = "images/generator.php?";

				url += "&model=" + $('input[name=model]:checked', "#settings").val();
				url += "&os=" + $('select[name=os] option:selected', "#settings").val();
				url += "&region=" + $('select[name=region] option:selected', "#settings").val();
				url += "&sd=" + $('select[name=sd] option:selected', "#settings").val();

				if ($('input[name=stLine]', "#settings").is(':checked')) url += "&stLine=true&stButton="+ $form.find('select[name=stButton] option:selected').val() +"&stTool="+ $form.find('select[name=stTool] option:selected').val();
				if ($('input[name=ndLine]', "#settings").is(':checked')) url += "&ndLine=true&ndButton="+ $form.find('select[name=ndButton] option:selected').val() +"&ndTool="+ $form.find('select[name=ndTool] option:selected').val();

				$IMG.attr('src', url);
			});
		});
	</script>
</head>
<body>
<div class="container">
	<h1>Old BIOS</h1>
	<span>Custom 3DS Splash Bootscreen<small>v1.0</small></span>
	<span class="credit">forked with &#10084; by <a href="https://twitter.com/victor_p_l">LightningWright</a></span>

<form id="settings" class="row">
	<fieldset class="form-group col-xs-10">

		<label for="model">Nintendo 3DS Model</label><br/>
		<div class="radio">
			<label><input type="radio" name="model" value="3ds" checked><img class="console" src="images/consoles/3ds.png" /></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="model" value="3dsxl"><img class="console" src="images/consoles/3dsxl.png" /></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="model" value="2ds"><img class="console" src="images/consoles/2ds.png" /></label>
		</div>
		<div class="radio">
		<label><input type="radio" name="model" value="n3ds"><img class="console" src="images/consoles/new3ds.png" /></label>
		</div>
		<div class="radio">
			<label><input type="radio" name="model" value="n3dsxl"><img class="console" src="images/consoles/new3dsxl.png" /></label>
		</div></br>
	</fieldset>
	<fieldset class="form-group col-xl-2">
		<label for="region">Region</label>
		<select name="region" class="form-control">
			<option value="usa" selected="selected">USA</option>
			<option value="eur">EUR</option>
			<option value="jpn">JPN</option>
		</select>
        <br>
		<label for="sd">SD Card</label>
		<select name="sd" class="form-control">
			<option value="2g" selected="selected">2GB</option>
			<option value="4g">4GB</option>
			<option value="8g">8GB</option>
			<option value="16g">16GB</option>
			<option value="32g">32GB</option>
			<option value="64g">64GB</option>
			<option value="128g">128GB</option>
		</select>
	</fieldset>
	<fieldset class="form-group col-xs-5">
		<label for="os">Type</label>
		<select name="os" class="form-control">
			<option value="luma612" selected="selected">Luma3DS v6.1.2</option>
			<option value="luma611">Luma3DS v6.1.1</option>
			<option value="luma601">Luma3DS v6.0.1</option>
			<option value="luma6">Luma3DS v6.0</option>
			<option value="mhx31">Menuhax v3.1</option>
			<option value="mhx30">Menuhax v3.0</option>
			<option value="mhx22">Menuhax v2.2</option>
			<option value="mhx21">Menuhax v2.1</option>
			<option value="*hax">*hax 2.7 gamma</option>
		</select>
	</fieldset>
	<fieldset class="form-group col-xs-7">
		<label for="something">Boot Options</label>
		<div class="checkbox">

			<label>
			<input type="checkbox" name="stLine">
			<strong>Hold</strong>
			<select name="stButton" class="form-control form-control-sm select-inline">
				<option value="L" selected="selected">L</option>
				<option value="R">R</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="X">X</option>
				<option value="Y">Y</option>
				<option value="UP">UP</option>
				<option value="DOWN">DOWN</option>
				<option value="LEFT">LEFT</option>
				<option value="RIGHT">RIGHT</option>
				<option value="START">START</option>
				<option value="SELECT">SELECT</option>
			</select>
			<strong>now</strong> to enter to
			<select name="stTool" class="form-control form-control-sm select-inline">
				<option value="rxtools" selected="selected">Rxtools settings</option>
				<option value="bootmanager">Boot Manager</option>
				<option value="gateway">Gateway Menu</option>
				<option value="settings">Settings</option>
			</select>

			</label>

			<label>
			<input type="checkbox" name="ndLine">
			<strong>Hold</strong>
			<select name="ndButton" class="form-control form-control-sm select-inline">
				<option value="L" selected="selected">L</option>
				<option value="R">R</option>
				<option value="A">A</option>
				<option value="B">B</option>
				<option value="X">X</option>
				<option value="Y">Y</option>
				<option value="UP">UP</option>
				<option value="DOWN">DOWN</option>
				<option value="LEFT">LEFT</option>
				<option value="RIGHT">RIGHT</option>
				<option value="START">START</option>
				<option value="SELECT">SELECT</option>
			</select>
			<strong>now</strong> to enter to
			<select name="ndTool" class="form-control form-control-sm select-inline">
				<option value="rxtools" selected="selected">Rxtools settings</option>
				<option value="bootmanager">Boot Manager</option>
				<option value="gateway">Gateway Menu</option>
				<option value="settings">Settings</option>
			</select>
			</label>
		</div>
	</fieldset>
</form>
<br>
	<center>
		<img id="preview" src="images/generator.php" /></center>
<br>
</div>
</body>
</html>


<!-- TODO::

	- IMAGE REWORK
	- MENHAX COMPTIBILITY DOUBLE IMAGE ETC,ETC...
-->
