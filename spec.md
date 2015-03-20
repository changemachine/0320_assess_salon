OVERVIEW
================================
The Salon Manager App allows users to add clients into a database and return filtered lists of clients grouped by the stylist each customer patronizes.  Users will also be able to add, modify and delete stylist categories, as well as clients.


SPECS - EXPECTATIONS
=================================
------------- ITEMS -------------
CREATE CLIENT
    INPUT: Sal Jones

READ CLIENT
    RETURN 1 CLIENT  
        OUTPUT: Sal Jones

    ALL CLIENTS
        INPUT: Sal, Lance, Dwight, Mary
        OUTPUT: Sal, Lance, Dwight, Mary

UPDATE CLIENT
    UPDATE Sal TO Sally

DELETE Lance

---------- CATEGORIES ------------
CREATE STYLIST
    INPUT: Robespierre

READ STYLIST
    RETURN clients BY stylist
        STYLIST: Hank
        CLIENTS: Sal, Mary

UPDATE STYLIST

DELETE STYLIST





SPECS - HOW
================================
------------- ITEMS -------------
CREATE CLIENT
    INPUT: Sal Jones

READ CLIENT
    RETURN 1 CLIENT  
        OUTPUT: Sal Jones

    ALL CLIENTS
        INPUT: Sal, Lance, Dwight, Mary
        OUTPUT: Sal, Lance, Dwight, Mary

UPDATE CLIENT
    UPDATE Sal TO Sally

DELETE Lance

---------- CATEGORIES ------------
CREATE STYLIST
    INPUT: Robespierre

READ STYLIST
    RETURN clients BY stylist
        STYLIST: Hank
        CLIENTS: Sal, Mary

UPDATE STYLIST

DELETE STYLIST
