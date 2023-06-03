const EditingPage = require('./editing.page');

/**
 * sub page containing specific selectors and methods for a specific page
 */
class FormPagePostgreSQL extends EditingPage {

  open() {
    return super.open('samples/E2E-Test/Editing_PostgreSQL.html');
  }

  async reopen() {
    const id = await this.fieldId.getText()
    return super.open(`samples/E2E-Test/Editing_PostgreSQL.html?id=${id}`);
  }
}

module.exports = new FormPagePostgreSQL();
