CREATE TABLE IF NOT EXISTS `users` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Name` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Contact` varchar(200) NOT NULL,
  `Date` date NOT NULL,
  `IsActive` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `Name`, `Email`, `Username`, `Password`, `Contact`, `Date`, `IsActive`) VALUES
(4, '', 'ram@domain.com', 'ram', '900150983cd24fb0d6963f7d28e17f72', '5678989', '2016-03-16', 1),
(6, 'xyz', 'new', 'new', 'cc03e747a6afbbcbf8be7668acfebee5', '67890', '2016-03-08', 1),
(7, 'Suman Sapkota', 'con@gmail.com', 'abc', '900150983cd24fb0d6963f7d28e17f72', '34567890', '2016-06-09', 1);
