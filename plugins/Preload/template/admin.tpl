{*
  Preload - A Piwigo Plugin that preloads images for a more responsive browsing experience.
  Copyright (C) 2015 Philippe Troin <phil@fifi.org>

  This program is free software: you can redistribute it and/or modify
  it under the terms of the GNU General Public License as published by
  the Free Software Foundation, either version 2 of the License, or
  (at your option) any later version.

  This program is distributed in the hope that it will be useful,
  but WITHOUT ANY WARRANTY; without even the implied warranty of
  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
  GNU General Public License for more details.

  You should have received a copy of the GNU General Public License
  along with this program.  If not, see <http://www.gnu.org/licenses/>.
*}
<div class="titrePage">
  <h2>Preload</h2>
</div>

<form action="" method="post" class="properties">
  <fieldset id="Preload">
    <legend>{'Configuration'|translate}</legend>
    <ul>
      <li>
	<label for="preloadImageCount">
	  <b style="width:40em;">{'Number of Images to Preload'|translate}:</b>
	</label>
	<input type="number" size="2" maxlength="3" name="preloadImageCount" id="preloadImageCount" value="{$Preload.imageCount}" min="0" max="10" style="width: 50px;">
      </li>
      <li>
	<input type="checkbox" name="preloadSquareThumbs" id="preloadSquareThumbs"{if $Preload.squareThumbs} checked="checked"{/if}>
	<label for="preloadSquareThumbs">
	  <b style="width:40em;">{'Preload Square Thumbnails'|translate}</b>
	</label>
      </li>
    </ul>
  </fieldset>
  <p class="formButtons">
    <input type="hidden" name="pwg_token" value="{$PWG_TOKEN}">
    <input type="submit" name="submit" value="{'Save Settings'|translate}">
  </p>
</form>
