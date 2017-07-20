<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="js/research-databases.js"></script>
<style>

input[type="radio"]:checked + label {
    text-decoration: underline !important;
}

</style>
</head>
<body>

<form>

		<input	data-market_token="all"
				data-result_title="All Databases"
				id="input-all"
				type="radio"
				name="market"
				value=""
				class="fn_finder-market"
				checked />
		<label for="input-all" class="">All Databases</label>

		<input	data-market_token="academic"
				data-result_title="Academic Databases"
				id="input-academic"
				type="radio"
				name="market"
				value="9"
				class="fn_finder-market">
		<label for="input-academic" class="">Academic</label>

		<input	data-market_token="biomedical-libraries"
				data-result_title="Medical Databases"
				id="input-medical"
				type="radio"
				name="market"
				value="11"
				class="fn_finder-market">
		<label for="input-medical" class="">Medical</label>

		<input	data-market_token="corporate-research"
				data-result_title="Corporate Databases"
				id="input-corporate"
				type="radio"
				name="market"
				value="15"
				class="fn_finder-market">
		<label for="input-corporate" class="">Corporate (? check token)</label>

		<input	data-market_token="government"
				data-result_title="Government Databases"
				id="input-government"
				type="radio"
				name="market"
				value="31"
				class="fn_finder-market">
		<label for="input-government" class="">Government</label>

		<input	data-market_token="public"
				data-result_title="Public Library Databases"
				id="input-public"
				type="radio"
				name="market"
				value="32"
				class="fn_finder-market">
		<label for="input-public" class="">Public Libraries</label>

		<input	data-market_token="us-high-schools"
				data-result_title="High School Databases"
				id="inpput-high"
				type="radio"
				name="market"
				value="37"
				class="fn_finder-market">
		<label for="inpput-high" class="">High Schools</label>

		<input	data-market_token="us-middle-schools"
				data-result_title="Middle School Databases"
				id="input-middle"
				type="radio"
				name="market"
				value="38"
				class="fn_finder-market">
		<label for="input-middle" class="">Middle Schools</label>

		<input	data-market_token="us-elementary-schools"
				data-result_title="Elementary School Databases"
				id="input-elementary"
				type="radio"
				name="market"
				value="39"
				class="fn_finder-market">
		<label for="input-elementary" class="">Elementary Schools</label>

		<input	data-market_token="canadian-schools"
				data-result_title="Canadian School Databases"
				id="input-canadian-schools"
				type="radio"
				name="market"
				value="35"
				class="fn_finder-market">
		<label for="input-canadian-schools" class="">Canadian Schools</label>

		<input	data-market_token="australia-new-zealand-schools"
				data-result_title="Australia %26 New Zealand School Databases"
				id="input-australia-nz-schools"
				type="radio"
				name="market"
				value="43"
				class="fn_finder-market">
		<label for="input-australia-nz-schools" class="">Australia &amp; New Zealand Schools</label>

		<input	data-market_token="uk-ireland-schools"
				data-result_title="UK %26 Ireland School Databases"
				id="input-uk-ireland-schools"
				type="radio"
				name="market"
				value="44"
				class="fn_finder-market">
		<label for="input-uk-ireland-schools" class="">UK &amp; Ireland Schools</label>

		<div id="fn_finder-result-header">result header</div>

		<input id="fn_finder-like" type="text" name="like" value="" class="fn_finder-like"
		onkeypress="if (event.keyCode == 13) { return false; }" />

		<input id="fn_finder-ft-only" type="checkbox" name="ft_only" value="true" class="fn_finder-ft-only" />
		<label for="fn_finder-ft-only" class="finder-ft-only">Full Text Only</label>

</form>

<div id="fn_finder-debug">debug</div>
<div id="fn_finder-result-list">results</div>
<div id="temp-lazyload-trigger">Page Trigger</div>

<script>
product_finder_config = {
	result_header_id: 'fn_finder-result-header',
	result_body_id: 'fn_finder-result-list'
};
//var product_finder_page = 1;
product_finder.init(product_finder_config); // bind events when the page is loaded


</script>
</body>
</html>
