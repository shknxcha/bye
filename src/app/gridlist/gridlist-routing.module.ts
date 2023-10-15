import { NgModule } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

import { GridlistPage } from './gridlist.page';

const routes: Routes = [
  {
    path: '',
    component: GridlistPage
  }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule],
})
export class GridlistPageRoutingModule {}
