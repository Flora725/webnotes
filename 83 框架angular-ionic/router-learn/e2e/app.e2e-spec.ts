import { RouterLearnPage } from './app.po';

describe('router-learn App', () => {
  let page: RouterLearnPage;

  beforeEach(() => {
    page = new RouterLearnPage();
  });

  it('should display welcome message', () => {
    page.navigateTo();
    expect(page.getParagraphText()).toEqual('Welcome to app!!');
  });
});
