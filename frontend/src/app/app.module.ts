import { BrowserModule } from '@angular/platform-browser';
import { NgModule } from '@angular/core';

import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { SignInComponent } from './sign-in/sign-in.component';
import { SubscribeComponent } from './subscribe/subscribe.component';
import { CalendarComponent } from './calendar/calendar.component';
import { ForumComponent } from './forum/forum.component';
import { ResetPasswordComponent } from './reset-password/reset-password.component';
import { AppRoutingModule } from './/app-routing.module';

@NgModule({
  declarations: [
    AppComponent,
    HomeComponent,
    SignInComponent,
    SubscribeComponent,
    CalendarComponent,
    ForumComponent,
    ResetPasswordComponent
  ],
  imports: [
    BrowserModule,
    AppRoutingModule
  ],
  providers: [],
  bootstrap: [AppComponent]
})
export class AppModule { }
