module.exports = {
    routes: [
      { path: '/', component: require('./components/home.vue')},
      /**
      **    Caisse routes
      **/
      { path: '/caisse', component: require('./components/caisse/home.vue')},
      { path: '/caisse/charge', component: require('./components/caisse/charge/home.vue'),
        children: [
          { path: '', component: require('./components/caisse/charge/list.vue') },
          { path: 'add', component: require('./components/caisse/charge/form.vue') },
          { path: 'edit/:id', component: require('./components/caisse/charge/form.vue') },
          { path: 'delete/:id', component: require('./components/caisse/charge/delete.vue') }
        ]
      },
      { path: '/caisse/alimentation', component: require('./components/caisse/alimentation/home.vue'),
        children: [
          { path: '', component: require('./components/caisse/alimentation/list.vue') },
          { path: 'add', component: require('./components/caisse/alimentation/form.vue') },
          { path: 'edit/:id', component: require('./components/caisse/alimentation/form.vue') },
          { path: 'delete/:id', component: require('./components/caisse/alimentation/delete.vue') }
        ]
      },
      { path: '/caisse/typecharge', component: require('./components/caisse/typecharge/home.vue'),
        children: [
          { path: '', component: require('./components/caisse/typecharge/list.vue') },
          { path: 'add', component: require('./components/caisse/typecharge/form.vue') },
          { path: 'edit/:id', component: require('./components/caisse/typecharge/form.vue') },
          { path: 'delete/:id', component: require('./components/caisse/typecharge/delete.vue') }
        ]
      },
      /**
      **    Banque routes
      **/
      { path: '/banque', component: require('./components/banque/home.vue')},
      { path: '/banque/encaissement', component: require('./components/banque/encaissement/home.vue'),
        children: [
          { path: '', component: require('./components/banque/encaissement/list.vue') },
          { path: 'add', component: require('./components/banque/encaissement/form.vue') },
          { path: 'edit/:id', component: require('./components/banque/encaissement/form.vue') },
          { path: 'delete/:id', component: require('./components/banque/encaissement/delete.vue') }
        ]
      },
      { path: '/banque/decaissement', component: require('./components/banque/decaissement/home.vue'),
        children: [
          { path: '', component: require('./components/banque/decaissement/list.vue') },
          { path: 'add', component: require('./components/banque/decaissement/form.vue') },
          { path: 'edit/:id', component: require('./components/banque/decaissement/form.vue') },
          { path: 'delete/:id', component: require('./components/banque/decaissement/delete.vue') }
        ]
      },
      { path: '/banque/operation', component: require('./components/banque/operation/home.vue'),
        children: [
          { path: '', component: require('./components/banque/operation/list.vue') },
          { path: 'add', component: require('./components/banque/operation/form.vue') },
          { path: 'edit/:id', component: require('./components/banque/operation/form.vue') },
          { path: 'delete/:id', component: require('./components/banque/operation/delete.vue') }
        ]
      },
      /**
      **    Entites routes
      **/
      { path: '/entite', component: require('./components/entite/home.vue')},
      { path: '/entite/responsable', component: require('./components/entite/responsable/home.vue'),
        children: [
          { path: '', component: require('./components/entite/responsable/list.vue') },
          { path: 'add', component: require('./components/entite/responsable/form.vue') },
          { path: 'edit/:id', component: require('./components/entite/responsable/form.vue') },
          { path: 'delete/:id', component: require('./components/entite/responsable/delete.vue') }
        ]
      },
      { path: '/entite/societe', component: require('./components/entite/societe/home.vue'),
        children: [
          { path: '', component: require('./components/entite/societe/list.vue') },
          { path: 'add', component: require('./components/entite/societe/form.vue') },
          { path: 'edit/:id', component: require('./components/entite/societe/form.vue') },
          { path: 'delete/:id', component: require('./components/entite/societe/delete.vue') }
        ]
      },
      { path: '/entite/marche', component: require('./components/entite/marche/home.vue'),
        children: [
          { path: '', component: require('./components/entite/marche/list.vue') },
          { path: 'add', component: require('./components/entite/marche/form.vue') },
          { path: 'edit/:id', component: require('./components/entite/marche/form.vue') },
          { path: 'delete/:id', component: require('./components/entite/marche/delete.vue') }
        ]
      },
  ]
};
