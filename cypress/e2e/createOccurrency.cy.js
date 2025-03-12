describe('occurrency flow', ()=> {
    beforeEach(()=>{
        cy.visit('http://hellocomunidade.test')
    })
    it('User should create occurrency', ()=>{
        cy.login()
        cy.get('[data-cy="createOc"]').click()
        cy.get('select').select('vazamento').should('have.value', 'vazamento')
        cy.get('[data-cy="ocStreet"]').type('4 Travessa Joaquim Nabuco')
        cy.get('[data-cy="title"]').type('Vazamento insano')
        cy.get('[data-cy="description"]').type('Ta vazando água no meio da rua')
        cy.get('[data-cy="submitOc"]').click()
        cy.get('[data-cy="ocTitle"]').contains('Vazamento insano')
    })

    it('User should view an occurrency', ()=>{
        cy.login()
        cy.get('[data-cy="showcard"]').first().click()
        cy.get('[data-cy="showOcTitle"]').contains('Vazamento insano')
    })

    it('User should view all his occurrencies', ()=>{
        cy.login()
        cy.get('[data-cy="myOcs"]').click()
        cy.get('[data-cy="ocTitle"]').first().click()
        cy.get('[data-cy="showOcTitle"]').contains('Vazamento insano')
    })
})