import { Module } from '@nestjs/common';
import { TypeOrmModule } from '@nestjs/typeorm';
import { FilmsModule} from "./films/films.module";
import { Connection } from 'typeorm';
import {UsersModule} from "./users/users.module";
import {GenresModule} from "./genres/genres.module";
import {GradesModule} from "./grades/grades.module";
import {DirectorsModule} from "./directors/directors.module";


@Module({
  imports: [TypeOrmModule.forRoot(),FilmsModule, UsersModule, GenresModule, GradesModule, DirectorsModule],
})
export class AppModule {
  constructor(private connection: Connection) {}
}
