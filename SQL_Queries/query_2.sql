
SELECT e.firstName, e.lastName, i.Date as 'date of infection', w.fName AS facility
FROM Employee e, Infected i, working w, Infections
WHERE e.MedicareCardNumber = w.MedicareCardNumber AND w.MedicareCardNumber = i.MedicareCardNumber AND Infections.InfectionType = "COVID-19" AND w.role = "doctor" AND (i.Date >= "2023-03-06" AND i.DATE <= "2023-03-19")
ORDER BY w.fName, e.firstName;


# aassumed that today is : 2023-3-20 ( past two weeks : 2023-03-06 ~ 2023-03-19 ) 
