@extends('Users.Layout.calender_layout')

@section('title')
   Calender
@endsection
@section('content')

<div class="main_content top-fixed">
    <div id="lnb">
      <div class="lnb-new-schedule">
        <button class="btn btn-primary btn-block lnb-new-schedule-btn" id="btn-new-schedule" type="button" data-toggle="modal">New schedule</button>
      </div>
      <div class="lnb-calendars" id="lnb-calendars">
        <div>
          <div class="lnb-calendars-item">
            <label>
              <input class="tui-full-calendar-checkbox-square" type="checkbox" value="all" checked><span></span><strong>View all</strong>
            </label>
          </div>
        </div>
        <div class="lnb-calendars-d1" id="calendarList"></div>
      </div>
    </div>
    <div id="right">
      <div class="calendar" id="menu"><span class="dropdown">
          <button class="btn btn-default btn-sm dropdown-toggle" id="dropdownMenu-calendarType" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="calendar-icon ic_view_month" id="calendarTypeIcon" style="margin-right: 4px;"></i><span id="calendarTypeName">Dropdown</span><i class="calendar-icon tui-full-calendar-dropdown-arrow"></i></button>
          <ul class="dropdown-menu dropdown-content" role="menu" aria-labelledby="dropdownMenu-calendarType">
            <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-daily"><i class="fa-solid fa-calendar-day mr-0"> </i>Daily</a></li>
            <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weekly"><i class="fa-solid fa-calendar mr-0"></i>Weekly</a></li>
            <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-monthly"><i class="fa-solid fa-calendar-days mr-0"> </i>Month</a></li>
            <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks2"><i class="fa-solid fa-list-ol mr-0"></i>2 weeks</a></li>
            <li role="presentation"><a class="dropdown-menu-title" role="menuitem" data-action="toggle-weeks3"><i class="fa-solid fa-list-ul mr-0"></i>3 weeks</a></li>
            <li class="dropdown-divider" role="presentation"></li>
            <li role="presentation"><a role="menuitem" data-action="toggle-workweek">
                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-workweek" checked><span class="checkbox-title">Show weekends</span></a></li>
            <li role="presentation"><a role="menuitem" data-action="toggle-start-day-1">
                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-start-day-1"><span class="checkbox-title">Start Week on Monday</span></a></li>
            <li role="presentation"><a role="menuitem" data-action="toggle-narrow-weekend">
                <input class="tui-full-calendar-checkbox-square" type="checkbox" value="toggle-narrow-weekend"><span class="checkbox-title">Narrower than weekdays</span></a></li>
          </ul></span><span id="menu-navi">
          <button class="btn btn-default btn-sm move-day" type="button" data-action="move-prev"> <i class="fa-solid fa-chevron-left" data-action="move-prev"></i></button>
          <button class="btn btn-default btn-sm move-today" type="button" data-action="move-today"> <i class="fa-solid fa-calendar-day mr-0"></i>Today</button>
          <button class="btn btn-default btn-sm move-day" type="button" data-action="move-next"> <i class="fa-solid fa-chevron-right" data-action="move-next"></i></button></span><span class="render-range" id="renderRange"></span></div>
    </div>
    <div id="calendar"></div>
  </div>
  <div class="shaded" id="backToTop" onclick="goTop()"><i class="fas fa-angle-up"> </i></div>
  <div id="toast">
    <p class="bold">Welcome to Calendar</p>
    <p>The most recent dashboard feature, create a new schedule and events</p>
  </div>


@endsection
