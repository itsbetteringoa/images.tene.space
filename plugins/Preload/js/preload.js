/*
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
*/

jQuery(window).load(function() {
    jQuery('HEAD LINK[rel=prefetch][href]')
    .each(function() {
	    var link = jQuery(this).attr('href');
	    if (link === undefined) return;
	    var lastdot = link.lastIndexOf('.');
	    if (lastdot >= 0) {
		var ext = link.substr(lastdot+1).toLowerCase();
		if (ext.match(/^(jpe?g|png)$/)) {
		    new Image().src = link;
		}
	    }
	});
});
