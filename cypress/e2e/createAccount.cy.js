describe('Login', ()=> {
    beforeEach(()=>{
            cy.visit('https://hellocomunidade-main-7vkmik.laravel.cloud/')
        })
    it('User should create account', () => {
        cy.get('[data-cy="register"]').click()
        cy.get('[data-cy="name"]').type('Maycon')
        cy.get('[data-cy="email"]').type('maycon@test.com')
        cy.get('[data-cy="password"]').type('password')
        cy.get('[data-cy="confirm-password"]').type('password')
        cy.get('[data-cy="street"]').type('Rua do José Jucá')
        cy.get('[data-cy="neighbour"]').type('Timbó')
        cy.get('[data-cy="city"]').type('Abreu e Lima')
        cy.get('[data-cy="submit"]').click()
        cy.get('[data-cy="welcome"]').contains('Hello Maycon!')
    })
})