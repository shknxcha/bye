import { NgModule } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';

import { IonicModule } from '@ionic/angular';

import { GridlistPageRoutingModule } from './gridlist-routing.module';

import { GridlistPage } from './gridlist.page';

@NgModule({
  imports: [
    CommonModule,
    FormsModule,
    IonicModule,
    GridlistPageRoutingModule
  ],
  declarations: [GridlistPage]
})
export class GridlistPageModule {}
