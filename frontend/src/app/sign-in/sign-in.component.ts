import {
  Component,
  OnInit
} from '@angular/core';
import {
  HttpClient,
  HttpParams,
  HttpHeaders
} from '@angular/common/http';
import {
  ActivatedRoute
} from '@angular/router';
import {
  Router
} from "@angular/router";



@Component({
  selector: 'app-sign-in',
  templateUrl: './sign-in.component.html',
  styleUrls: ['./sign-in.component.css']
})
export class SignInComponent implements OnInit {

  email: string = '';
  password: string = '';
  returnURL: any;

  constructor(private http: HttpClient, private router: Router, private route: ActivatedRoute) {}

  ngOnInit() {
    this.returnURL = this.route.snapshot.queryParams['returnURL'] || '/calendar';
  }

  login() {
    const body = new HttpParams()
      .set('email', this.email)
      .set('password', this.password);
    this.http.post('http://localhost:8080/backend/auth.php', body.toString(), {
      headers: new HttpHeaders()
        .set('Content-Type', 'application/x-www-form-urlencoded')
    }).subscribe(data => {
      if (data === false) {
        this.email = '';
        this.password = '';
      } else {
        localStorage.setItem('currentUsr', JSON.stringify(data));
        this.router.navigateByUrl(this.returnURL);

      }
    });
  }
}