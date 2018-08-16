import { Component, OnInit } from '@angular/core';
import { Subject } from 'rxjs'; 
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-calendar',
  templateUrl: './calendar.component.html',
  styleUrls: ['./calendar.component.css']
})
export class CalendarComponent implements OnInit {

  viewDate: Date;
  refresh: Subject<any> = new Subject();
  activeDayIsOpen: boolean;

  constructor(private http: HttpClient) {
    this.viewDate = new Date();
    this.activeDayIsOpen = true;
  }

  ngOnInit() {
    this.http.get('http://localhost:8080/backendRnR/bible_api.php').subscribe(console.log);
  }

}
