export default
{
	state(){
		return{
			iduser: null,
			username: null,
			user: null,
			auth: null,
		}
	},

	getters:
	{
		iduser:   state => state.iduser,
		username: state => state.name,
		getUser:  state => state.user,
		getAuth:  state => state.auth,
	},

	mutations:
	{
		setUser (state, user)
        {
			state.user 	   = user
			state.iduser   = user.id
			state.username = user.name
		},
		
		setAuth (state, auth)
        {
            state.auth 	= auth
		},
		
		setIdUsuario(state, iduser)
		{
			state.iduser  = iduser
		},

		setNbUsuario(state, username)
		{
			state.username = username
		}
	}
}