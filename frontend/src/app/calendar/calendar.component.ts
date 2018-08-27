import { Component, OnInit, ChangeDetectorRef, OnChanges } from '@angular/core';
import { Subject } from 'rxjs'; 
import { HttpClient } from '@angular/common/http';
import { CalendarEvent } from 'angular-calendar';
import { EventColor } from 'calendar-utils';
import { map } from 'rxjs/operators';
import { Observable } from 'rxjs';

@Component({
  selector: 'app-calendar',
  templateUrl: './calendar.component.html',
  styleUrls: ['./calendar.component.css']
})
export class CalendarComponent implements OnInit, OnChanges {
  viewDate: Date;
  refresh: Subject<any> = new Subject();
  activeDayIsOpen: boolean;
  events: any = [];

  constructor(private http: HttpClient, private c: ChangeDetectorRef) {
    this.viewDate = new Date();
    this.activeDayIsOpen = true;
    this.getData();
  }

  ngOnChanges() { }

  ngOnInit() { }

  getData() {
    this.http
      .get('http://localhost:8080/backend/controllers/calendar.php')
      .subscribe((data : any[])=> {
        for (let d of data) {
          this.events.push(<CalendarEvent>{
            id: d.id,
            start: new Date(d.date),
            title: d.passageName,
            color: {
              primary: '#'+Math.floor(Math.random()*16777215).toString(16),
              secondary: '#'+Math.floor(Math.random()*16777215).toString(16)
            },
          })
        }
        console.log(data);
        this.refresh.next();
      });
  }

}
