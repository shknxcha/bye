import { ComponentFixture, TestBed } from '@angular/core/testing';
import { GridlistPage } from './gridlist.page';

describe('GridlistPage', () => {
  let component: GridlistPage;
  let fixture: ComponentFixture<GridlistPage>;

  beforeEach(async(() => {
    fixture = TestBed.createComponent(GridlistPage);
    component = fixture.componentInstance;
    fixture.detectChanges();
  }));

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
