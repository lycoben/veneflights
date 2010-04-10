<?php
/**
 * @version		$Id:default.php 14 2008-02-06 09:35:30Z p0l0 $
 * @package		Joomla jWeather
 * @author		Marco Neumann
 * @copyright	Copyright (c) 2008, Marco Neumann
 * @license		BSD  
 * All rights reserved.
 * 
 * Redistribution and use in source and binary forms, with or without modification, are permitted provided that the following conditions are met:
 * 
 * 	- Redistributions of source code must retain the above copyright notice, this list of conditions and the following disclaimer.
 * 
 * 	- Redistributions in binary form must reproduce the above copyright notice, this list of conditions and the following disclaimer in the documentation and/or other materials provided with the distribution.
 * 
 * 	- Neither the name of the jWeather nor the names of its contributors may be used to endorse or promote products derived from this software without specific prior written permission.
 * 
 * THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS
 * "AS IS" AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT
 * LIMITED TO, THE IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR
 * A PARTICULAR PURPOSE ARE DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT OWNER OR
 * CONTRIBUTORS BE LIABLE FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL,
 * EXEMPLARY, OR CONSEQUENTIAL DAMAGES (INCLUDING, BUT NOT LIMITED TO,
 * PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES; LOSS OF USE, DATA, OR
 * PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND ON ANY THEORY OF
 * LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT (INCLUDING
 * NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
 * SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 * 
 */

//no direct access
defined('_JEXEC') or die('Restricted access');

/**
 * We need mootools for fix png in IE
 */
JHTML::_('behavior.mootools');

/**
 * Load Document and add stylesheet
 */
$doc = &JFactory::getDocument();
$doc->addStyleSheet( JURI::base() . 'modules/mod_jweather/tmpl/mod_jweather.css' );
?>
<div id="jweather_<?php echo $params->get('idname'); ?>" class="jweather">

	<table border="0">
		<?php if (isset($weatherData['desc'])) { ?>
			<?php $locality = explode(',', $weatherData['desc']); ?>
			<tr>
				<td class="jweather_desc" colspan="<?php echo $weatherData['numDays']; ?>">
					<?php echo JText::_('Weather for').' '.$locality[0]; ?>
				</td>
			</tr>
		<?php } ?>
		<?php if (isset($weatherData['icon'])) { ?>
			<tr>
				<?php foreach ($weatherData['icon'] as $icons): ?>
					<td class="jweather_icon">
						<img src="<?php echo $icons['image']; ?>" alt="<?php echo JText::_($icons['alt']); ?>" />
					</td>
				<?php endforeach; ?>	
			</tr>
			<?php
				/**
				 * IE6 PNG Transparency Fix
				 */
			?>
			<!--[if lte IE 6]>
			<script type="text/javascript">
				function doFix()
				{
					var blankImg = '<?php echo JURI::base(); ?>modules/mod_jweather/tmpl/blank.gif';
					var jwObject = $('jweather_<?php echo $params->get('idname'); ?>');
				
					var elements = jwObject.getElements('img');
					elements.each(function(el){
						var src = el.src;
			
						// test for png
						if ( /\.png$/.test( src.toLowerCase() ) && el.getStyle('filter') == '' ) {
							if (el.currentStyle.width == 'auto' && el.currentStyle.height == 'auto')
							{
								el.style.width = el.offsetWidth + 'px';
								el.style.height = el.offsetHeight + 'px';
							}
			
				  			// set filter
				  			el.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='" +
				                                     src + "',sizingMethod='scale')";
			                // set blank image
			                el.src = blankImg;
			            }
			   			else
			   			{
					      // remove filter
			    		  el.runtimeStyle.filter = "";
			   			}
					});
				}
				
				window.addEvent('domready', doFix);
			</script>
			<![endif]-->
		<?php } ?>
		<?php if (isset($weatherData['temp'])) { ?>
			<tr>
				<?php foreach ($weatherData['temp'] as $temps): ?>
					<td class="jweather_temp">
						<span class="jweather_tempText"><?php echo $temps; ?></span>
					</td>
				<?php endforeach; ?>
			</tr>
		<?php } ?>
		<?php if (isset($weatherData['days'])) { ?>
			<tr>
				<?php foreach ($weatherData['days'] as $dayName): ?>
					<td class="jweather_day">
						<span class="jweather_dayText"><?php echo $dayName; ?></span>
					</td>
				<?php endforeach; ?>
			</tr>
		<?php } ?>
		<?php if (isset($weatherData['forecast'])) { ?>
			<tr>
				<?php foreach ($weatherData['forecast'] as $forecast): ?>
					<td class="jweather_forecast">
						<span class="jweather_forecastText"><?php echo JText::_($forecast); ?></span>
					</td>
				<?php endforeach; ?>
			</tr>
		<?php } ?>
	</table>
</div>