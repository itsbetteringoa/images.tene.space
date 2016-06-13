{if !empty($chronology_navigation_bars)}
{foreach from=$chronology_navigation_bars item=bar}
<div class="calendarBar">
	{if isset($bar.previous)}
		<div style="float:left;margin-right:5px">&laquo; <a class = "btn btn-default" role="button" href="{$bar.previous.URL}">{$bar.previous.LABEL}</a></div>
	{/if}
	{if isset($bar.next)}
		<div style="float:right;margin-left:5px"><a class = "btn btn-default" role="button"  href="{$bar.next.URL}">{$bar.next.LABEL}</a> &raquo;</div>
	{/if}
	{if empty($bar.items)}
		&nbsp;
	{else}
		{foreach from=$bar.items item=item}
		{if !isset($item.URL)}
		<span class="calItem">{$item.LABEL}</span>
		{else}
		<a class = "btn btn-default" role="button"  {if isset($item.NB_IMAGES)} title="{$item.NB_IMAGES|@translate_dec:'%d photo':'%d photos'}"{/if} href="{$item.URL}">{$item.LABEL}</a>
		{/if}
		{/foreach}
	{/if}
</div>
{/foreach}
{/if}


{if isset($chronology_calendar.month_view) || !empty($chronology_calendar.calendar_bars)}
{assign var=c_date value=$calendar_date|explode:"-"}
{if !empty($chronology_calendar.calendar_bars)} {$c_date[1]=1} {/if}
{$def_date="`$c_date[0]`-`$c_date[1]`-01"|date_format:'%Y-%m-%d'}
{$c_date[1]=$c_date[1]-1}
{$ind=0}
{if isset($chronology_calendar.month_view)}
	{foreach from=$chronology_calendar.month_view.weeks item=week}
	 	{foreach from=$week item=day}
	 	{if !empty($day)}
	 		{if isset($day.IMAGE)}
	 			{$arr_cal[$ind].title=$day.NB_ELEMENTS|@translate_dec:'%d photo':'%d photos' }
	 			{$arr_cal[$ind].start=$day.DAY}
	 			{$arr_cal[$ind].url=$day.U_IMG_LINK}
	 			{$arr_cal[$ind].src=$day.IMAGE}
	 			{$arr_cal[$ind].alt=$day.IMAGE_ALT}
	 			{$ind=$ind+1}
	 		{/if}
	 	{/if}
	 {/foreach}
	{/foreach}
	{$img_width=130}
{else}
	{foreach from=$chronology_calendar.calendar_bars item=bar}
		{foreach from=$bar.items item=day}		
			{if isset($day.URL)}
				{$arr_cal[$ind].title=$day.NB_IMAGES|@translate_dec:'%d photo':'%d photos' }
	 			{$arr_cal[$ind].start_d=$day.LABEL}
	 			{$arr_cal[$ind].start_m=$day.month}
	 			{$arr_cal[$ind].url=$day.URL}
	 			{$arr_cal[$ind].src=$day.derivative}	 	
	 			{$arr_cal[$ind].alt=$day.alt}
	 			{$ind=$ind+1}
		{/if}
	
	{/foreach}
{/foreach}
	{$img_width=50}
{/if}

<div id='calendar'></div>
{footer_script}{literal}$(document).ready(function(){
  {/literal}
  var date = new Date({$c_date[0]},{$c_date[1]}{literal},1);
    var d = date.getDate();
    var m = date.getMonth();
    var y = date.getFullYear();

    var events_array = [
    {/literal}

    {foreach from=$arr_cal item=event}
           	{ 
	        title: "{$event.title}",
	       {if isset($chronology_calendar.month_view)} start: new Date(y, m, {$event.start}),
	       {else} start: new Date(y, {$event.start_m}, {$event.start_d}),
	       {/if}
	        src:	"{$event.src}",
	        alt:	"{$event.alt}",
	        url:	"{$event.url}"
	        },
	{/foreach}
    	
    {literal}
    ];
    $('#calendar').fullCalendar({
        header: {
            left: '',
            center: 'title',
            right: ''
        }, 

        defaultDate: "{/literal}{$def_date}",
        {if !empty($chronology_calendar.calendar_bars)}
        	defaultView: 'year',
			yearColumns: 3,
			selectable: false,
			selectHelper: false,
			className:	'full_year',
        {else} editable: false,
        {/if}{literal}
        allDay: true,
        events: events_array,
        backgroundColor: 'transparent',
        borderColor: 'none',
        
        eventRender: function(event, element) {
		     for(var obj of events_array) {
		        if(event.alt==obj.alt)	
		        	element.find('.fc-content').append('<img src="' + obj.src + '" width="130" alt="' + obj.alt+'" title="' + obj.title +'"> ')
			}
	        	
	        }
        })
    });
    {/literal}{/footer_script}
<!-- 
 <thead>
 <tr>
 {foreach from=$chronology_calendar.month_view.wday_labels item=wday}
	<th>{$wday}</th>
 {/foreach}
 </tr>
 </thead>
{html_style}
.calMonth TD, .calMonth .calImg{
	width:{$chronology_calendar.month_view.CELL_WIDTH}px;height:{$chronology_calendar.month_view.CELL_HEIGHT}px
}
{/html_style}

 {foreach from=$chronology_calendar.month_view.weeks item=week}
 <tr>
 	{foreach from=$week item=day}
 	{if !empty($day)}
 		{if isset($day.IMAGE)}
 			<td class="calDayCellFull">
	 			<div class="calBackDate">{$day.DAY}</div><div class="calForeDate">{$day.DAY}</div>
	 			<div class="calImg">
					<a href="{$day.U_IMG_LINK}">
 						<img src="{$day.IMAGE}" alt="{$day.IMAGE_ALT}" title="{$day.NB_ELEMENTS|@translate_dec:'%d photo':'%d photos'}">
					</a>
				</div>
 		{else}
 			<td class="calDayCellEmpty">{$day.DAY}
 		{/if}
 	{else}{*blank cell first or last row only*}
 		<td>
 	{/if}
 	</td>
 	{/foreach}{*day in week*}
 </tr>
 {/foreach}{*week in month*}
</table>
-->
{/if}

