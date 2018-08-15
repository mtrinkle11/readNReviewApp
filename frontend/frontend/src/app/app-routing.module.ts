import { NgModule } from '@angular/core';
import { RouterModule, Routes } from "@angular/router";

import { CalendarComponent } from "./calendar/calendar.component";
import { ForumComponent } from "./forum/forum.component";
import { HomeComponent } from "./home/home.component";
import { ResetPasswordComponent } from "./reset-password/reset-password.component";
import { SignInComponent } from "./sign-in/sign-in.component";
import { SubscribeComponent } from "./subscribe/subscribe.component";


const routes: Routes = [
  { path: "calendar", component: CalendarComponent },
  { path: "forum", component: ForumComponent },
  { path: "home", component: HomeComponent },
  { path: "sign-in", component: SignInComponent },
  { path: "subscribe", component: SubscribeComponent },
  { path: "reset-password", component: ResetPasswordComponent },
  { path: "", redirectTo: "/", pathMatch: "full" }
  ];
  
  
  @NgModule({
    imports: [RouterModule.forRoot(routes)],
    exports: [RouterModule],
  })
  export class AppRoutingModule { }