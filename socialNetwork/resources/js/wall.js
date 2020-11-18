let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content')
axios.post('showUnfollowers', {}, {
    headers: {
        'x-csrf-token': csrfToken
    }
}).then(function (response) {
    for (let key in response.data) {
        let unfollower = document.querySelector('.unfollower').cloneNode(true)
        unfollower.textContent = response.data[key].username
        unfollower.setAttribute('href', '/addFriend/' + response.data[key].username)
        document.querySelector('.unfollowers-container').append(unfollower)
    }
})
