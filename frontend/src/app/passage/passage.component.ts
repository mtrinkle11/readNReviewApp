import { Component, OnInit } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { ParamMap, Router, ActivatedRoute } from '@angular/router';

@Component({
  selector: 'app-passage',
  templateUrl: './passage.component.html',
  styleUrls: ['./passage.component.css']
})
export class PassageComponent implements OnInit {
  public passage= {};
  constructor(private http: HttpClient, private router: ActivatedRoute) { }

  ngOnInit() {
    this.http.get('https://api.lsm.org/recver.php?String='+ this.router.snapshot.params.id +'&Out=json')
    .subscribe(res=>{
      this.passage = res;
      console.log(res);
    });
  }

}
