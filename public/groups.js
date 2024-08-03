document.addEventListener('DOMContentLoaded', () => {
    async function getGroups() {
        try {
        const response = await fetch('http://localhost/BookClub/groups.php', {  // THIS NEEDS to be changed from localhost
            method: 'GET',
            headers: {
            'Content-Type': 'application/json'
            }
        });
    
        const text = await response.json();

        return JSON.stringify(text)

        } catch (error) {
        console.error('Error getting groups:', error);
        const data = {
            "bg_id": 999,
            "bg_name": "foo group",
            "bg_current_book_id": 1
        }
        return JSON.stringify(data)
        // return false;
        }
    }

    const groupData = getGroups();

    // construct html elements from groupData
});