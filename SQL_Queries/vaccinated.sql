vaccinated = {dose_num, vaccinated_date, f_name, f_address, medicare_num, v_type}
12
CREATE TABLE vaccinated (
dose_num INT NOT NULL,
vaccinated_date DATE NOT NULL,
f_name VARCHAR(255),
f_address VARCHAR(255),
medicare_num CHAR(14),
v_type VARCHAR(255) NOT NULL,
foreign key (f_name, f_address) REFERENCES lac353_4.facility(name, address) ON
DELETE CASCADE ON UPDATE CASCADE,
foreign key (medicare_num) REFERENCES lac353_4.Employee(MedicareCardNumber)
ON DELETE CASCADE ON UPDATE CASCADE
);
