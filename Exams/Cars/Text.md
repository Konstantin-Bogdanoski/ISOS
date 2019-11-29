@author Konstantin Bogdanoski (konstantin.b@live.com)

Create a web app that represents an Auto Service shop
***
***1.*** The app has Cars, Accessories (_which have been added when the car was serviced/repaired_),
Owner (_owner of the car_), Mechanic (_mechanic which repaired/serviced the car_).
> Relations: Car 1:M Accessory, Car M:1 Owner, Car M:N Mechanic
>
> CAR: id, car_model, date, OWNER, MECHANIC
>
> OWNER: id, name, phone, mail
>
> MECHANIC: id, name, department(which part of the car)
>
> ACCESSORY: id, name, price, CAR 

***2.*** The Mechanics can add Accessories and Cars respectively. Every Car must have an owner.
Main page has a list of all the cars + button to add a new one.
It has links to the specific Servicing it was done (Detailed information about
who repaired the car and who owns the car, and the total price of the service.)