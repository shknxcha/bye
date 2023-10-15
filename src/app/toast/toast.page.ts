import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-toast',
  templateUrl: './toast.page.html',
  styleUrls: ['./toast.page.scss'],
})
export class ToastPage implements OnInit {

  constructor() { }

  ngOnInit() {
  }

  public toastButton = [{
    text: "Dismiss",
    role: "Cancel",
    handler: () => {
      console.log("dismiss click");
    }
  }]

}
