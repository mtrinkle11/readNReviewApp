import { NgModule } from "@angular/core";
import { RouterModule, Routes } from "@angular/router";

import { CalendarComponent } from "./calendar/calendar.component";
import { ForumComponent } from "./forum/forum.component";
import { HomeComponent } from "./home/home.component";
import { ResetPasswordComponent } from "./reset-password/reset-password.component";
import { SignInComponent } from "./sign-in/sign-in.component";
import { SubscribeComponent } from "./subscribe/subscribe.component";
import { PassageComponent } from "./passage/passage.component";
import { AuthGuard } from './guards/auth.guard';
import { Router, ActivatedRoute } from '@angular/router';



const routes: Routes = [
  { path: "calendar", component: CalendarComponent, canActivate: [AuthGuard] },
  { path: "forum", component: ForumComponent, canActivate: [AuthGuard] },
  { path: "", component: HomeComponent },
  { path: "sign-in", component: SignInComponent },
  { path: "subscribe", component: SubscribeComponent },
  { path: "reset-password", component: ResetPasswordComponent },
  { path: "passage/:id", component: PassageComponent, canActivate: [AuthGuard]}
];
  
  
  @NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
  })
  export class AppRoutingModule { }