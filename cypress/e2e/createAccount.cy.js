describe('Login', ()=> {
    beforeEach(()=>{
            cy.visit('http://hellocomunidade.test')
        })
    it('User should create account', () => {
        cy.get('[data-cy="register"]').click()
        cy.get('[data-cy="name"]').type('Jane Dododoe')
        cy.get('[data-cy="email"]').type('janedododoe@test.com')
        cy.get('[data-cy="password"]').type('password')
        cy.get('[data-cy="confirm-password"]').type('password')
        cy.get('[data-cy="street"]').type('Rua do José Jucá')
        cy.get('[data-cy="neighbour"]').type('Timbó')
        cy.get('[data-cy="city"]').type('Abreu e Lima')
        cy.get('[data-cy="submit"]').click()
        cy.get('[data-cy="welcome"]').contains('HelloComunidade')
    })
})