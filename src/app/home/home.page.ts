import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';

@Component({
  selector: 'app-home',
  templateUrl: 'home.page.html',
  styleUrls: ['home.page.scss'],
})

export class HomePage implements OnInit {

  userRole: string ="";

  constructor() {}

  ngOnInit(): void{
    console.log(history.state)
    this.userRole = history.state.userRole
  }

}
