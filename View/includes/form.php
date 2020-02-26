<?php
?>

<div id="form_container">
		<h1><a>Student</a></h1>
		<form id="form_100090" class="appnitro"  method="post" action="">
					<div class="form_description">
			<h2>Student</h2>
			<p>Information About u;</p>
		</div>
            <ul >

					<li id="li_1" >
		<label class="description" for="element_1">First Name </label>
		<div>
			<input id="element_1" name="becode.student.first_name" class="element text medium" type="text" maxlength="255" value=""/>
		</div><p class="guidelines" id="guide_1"><small>Plz enter your first name.</small></p>
		</li>		<li id="li_2" >
		<label class="description" for="element_2">Last Name </label>
		<div>
			<input id="element_2" name="becode.student.last_name" class="element text medium" type="text" maxlength="255" value=""/>
		</div><p class="guidelines" id="guide_2"><small>Plz enter your last name.</small></p>
		</li>		<li id="li_3" >
		<label class="description" for="element_3">User Name </label>
		<div>
			<input id="element_3" name="becode.student.username" class="element text medium" type="text" maxlength="255" value=""/>
		</div><p class="guidelines" id="guide_3"><small>Plz insert your username.</small></p>
		</li>		<li id="li_4" >
		<label class="description" for="element_4">Linkedin </label>
		<div>
			<input id="element_4" name="becode.student.linkedin" class="element text medium" type="text" maxlength="255" value="http://"/>
		</div><p class="guidelines" id="guide_4"><small>Plz enter your LinkedIn page</small></p>
		</li>		<li id="li_5" >
		<label class="description" for="element_5">Github </label>
		<div>
			<input id="element_5" name="becode.student.github" class="element text medium" type="text" maxlength="255" value="http://"/>
		</div><p class="guidelines" id="guide_5"><small>Plz enter your Github.</small></p>
		</li>		<li id="li_6" >
		<label class="description" for="element_6">Email </label>
		<div>
			<input id="element_6" name="becode.student.email" class="element text medium" type="text" maxlength="255" value=""/>
		</div><p class="guidelines" id="guide_6"><small>Plz enter your Email.</small></p>
		</li>		<li id="li_7" >
		<label class="description" for="element_7">Preferred Language </label>
		<div>
		<select class="element select medium" id="element_7" name="becode.student.preferred_language">
			<option value="" selected="selected"></option>
            <option value="nl" >Dutch</option>
            <option value="de" >German</option>
            <option value="aq" >Eskimo</option>
            <option value="hk" >Cantonese</option>

		</select>
		</div><p class="guidelines" id="guide_7"><small>Plz enter your preferred language.</small></p>
                    <select class="element select medium" id="element_7" name="becode.student.gender">
                        <option value="m" selected="selected">male</option>
                        <option value="f" >female</option>



                    </select>
		</li>

					<li class="buttons">
			    <input type="hidden" name="form_id" value="100090" />

				<input id="saveForm" class="button_text" type="submit" name="submit" value="Submit" />
		</li>
            </ul>
		</form>

</div>
