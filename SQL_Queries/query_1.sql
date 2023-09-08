
SELECT f.name AS 'facility name', f.address, f.city, f.province, f.postalCode, f.phoneNumber, f.webAddress, f.type, f.capacity, g.managerfirstName AS 'general manager name', COUNT(w.fName) AS 'currently working employee number'
FROM facility f
LEFT JOIN generalManager g ON f.name = g.facilityName
LEFT JOIN working w ON f.name = w.fName
GROUP BY f.name
ORDER BY f.province,f.city,f.type,COUNT(w.fName);
