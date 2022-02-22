/* <!-- InnerJoin de las tablas "Cursos y Usuarios"--> */

SELECT td_curso_usuario.cur_id,
tm_curso.cur_id,
tm_curso.cur_nom,
tm_curso.cur_descrip,
tm_curso.cur_fechIni,
tm_curso.cur_fechFin,
tm_usuario.usu_id,
tm_usuario.usu_nom,
tm_usuario.usu_apep,
tm_usuario.usu_apem,
tm_instructor.inst_id,
tm_instructor.inst_nom,
tm_instructor.inst_apep,
tm_instructor.inst_apem
FROM `td_curso_usuario` INNER JOIN
tm_curso on td_curso_usuario.cur_id = tm_curso.cur_id INNER JOIN
tm_usuario ON td_curso_usuario.usu_id = tm_usuario.usu_id INNER JOIN
tm_instructor ON tm_curso.inst_id = tm_instructor.inst_id
WHERE
td_curso_usuario.usu_id = 1
--------------------------------------------------------------------------------------------------------------------

